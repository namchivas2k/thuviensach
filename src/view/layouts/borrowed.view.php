<h1>Sách đã mượn (<?= count(View::getData('borrowed')) ?>)</h1>
<table class="table table-striped">
    <?php if (count(View::getData('borrowed')) <= 0) : ?>
        <i>Không có dữ liệu</i>
    <?php else : ?>
        <thead>
            <tr>
                <th>ID</th>
                <th>Mã sách</th>
                <th>Tên sách</th>
                <th>Ảnh</th>
                <th>Người mượn</th>
                <th>Ngày mượn</th>
                <th>Ngày trả</th>
                <th>Action(s)</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach (View::getData('borrowed') as $index => $book) : ?>
                <tr>
                    <th scope="row"><?= $book->bID ?></th>
                    <th><?= $book->id ?></th>
                    <td><strong><?= $book->name ?></strong></td>
                    <td>
                        <img width="100px" src="<?= urldecode($book->image) ?>" class="rounded float-start border" alt="<?= $book->name ?>">
                    </td>
                    <td> <?= $book->username ?></td>
                    <td> <?= $book->startTime ?></td>
                    <td> <?= $book->endTime ?></td>
                    <td>
                        <button class="btn btn-sm btn-danger btn-confirm-borrowed" data-borrow-id="<?= $book->bID ?>" data-book-id="<?= $book->id ?>">Đã
                            trả</button>
                    </td>

                </tr>
            <?php endforeach  ?>
        </tbody>
    <?php endif ?>
</table>