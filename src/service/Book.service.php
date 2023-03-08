<?php

class BookService
{

    private static function formatText($str)
    {
        $str = trim(mb_strtolower($str));
        $str = preg_replace('/(à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ)/', 'a', $str);
        $str = preg_replace('/(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ)/', 'e', $str);
        $str = preg_replace('/(ì|í|ị|ỉ|ĩ)/', 'i', $str);
        $str = preg_replace('/(ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ)/', 'o', $str);
        $str = preg_replace('/(ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)/', 'u', $str);
        $str = preg_replace('/(ỳ|ý|ỵ|ỷ|ỹ)/', 'y', $str);
        $str = preg_replace('/(đ)/', 'd', $str);
        $str = preg_replace('/[^a-z0-9-\s]/', '', $str);
        $str = preg_replace('/([\s]+)/', '-', $str);
        $str = preg_replace('/-/i', ' ', $str);
        return $str;
    }

    static function getAll()
    {
        $books = file_get_contents(BOOK_DATA_PATH);
        return json_decode($books);
    }

    private static function changeStock($bookID, $TYPE = 'increase' | "decrease")
    {
        $allBooks = self::getAll();
        foreach ($allBooks as $index => $book) {
            if ($book->id == $bookID) {
                $bStock = ((int) $allBooks[$index]->stock);
                if ($bStock <= 0) return false;

                $nStock = $TYPE == 'increase' ? ($bStock + 1) : ($bStock - 1);
                $allBooks[$index]->stock = $nStock;
                file_put_contents(BOOK_DATA_PATH, json_encode($allBooks, JSON_UNESCAPED_UNICODE));
                return true;
                break;
            }
        }

        return false;
    }

    static function search($query)
    {
        $books = self::getAll();
        $query = self::formatText($query);

        $books = array_filter($books, fn ($b, $k) => preg_match("/$query/i", self::formatText($b->name)), ARRAY_FILTER_USE_BOTH);

        return $books;
    }


    static function borrow($data)
    {
        $bookID = $data['id'];
        if (self::changeStock($bookID, 'decrease')) {
            return self::addBorrow($data);
        };
        return false;
    }

    static function getBorrow()
    {
        $data = file_get_contents(BORROW_DATA_PATH);
        return json_decode($data);
    }

    static function addBorrow($data)
    {
        $preData = self::getBorrow();
        $data['bID'] = count($preData) + 1;
        array_push($preData, $data);
        file_put_contents(BORROW_DATA_PATH, json_encode($preData, JSON_UNESCAPED_UNICODE));
        return true;
    }

    static function deleteBorrow($data)
    {
        $bookID = $data['bookID'];
        $borrowID = $data['bID'];

        $nBorrow = [];
        $isFound = false;
        foreach (self::getBorrow() as $index => $val) {
            if ($val->bID == $borrowID) {
                $isFound = true;
            } else {
                array_push($nBorrow, $val);
            }
        }

        if ($isFound) {
            file_put_contents(BORROW_DATA_PATH, json_encode($nBorrow, JSON_UNESCAPED_UNICODE));
            self::changeStock($bookID, 'increase');
            return true;
        } else {
            return false;
        }
    }
}
