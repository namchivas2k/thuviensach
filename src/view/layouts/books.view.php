<div class="d-flex justify-content-between align-items-center">
    <h1>Tất cả sách (<?= count(View::getData('books')) ?>)</h1>
    <form class="input-group mb-3 w-auto">
        <input name="q" type="text" class="form-control" placeholder="Tìm kiếm...">
        <button class="btn btn-primary" type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
    </form>
</div>
<hr>



<table class="table table-striped">
    <?php if (count(View::getData('books')) <= 0) : ?>
    <i>Không tìm thấy sách nào</i>
    <?php else : ?>


    <thead>
        <tr>
            <th scope="col">Mã sách</th>
            <th scope="col">Tên sách</th>
            <th scope="col">Ảnh</th>
            <th scope="col">Kho/Tổng số</th>
            <th>Action(s)</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach (View::getData('books') as $index => $book) : ?>
        <tr>
            <th scope="row"><?= $book->id ?></th>
            <td><strong><?= $book->name ?></strong></td>
            <td>
                <img width="100px" src="<?= $book->image ?>" class="rounded float-start border"
                    alt="<?= $book->name ?>">
            </td>
            <td> <?= $book->stock ?> / <?= $book->total ?></td>
            <td>
                <button data-book-id="<?= $book->id ?>" data-book-name="<?= $book->name ?>"
                    data-book-image="<?=$book->image ?>" type="button" class="btn btn-primary btn-borrow"
                    data-bs-toggle="modal" data-bs-target="#exampleModal">Mượn</button>
            </td>
        </tr>
        <?php endforeach  ?>
    </tbody>
    <?php endif ?>
</table>


<!-- Modal -->
<form method="post" class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Thông tin người mượn sách</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="list-group">

                    <input type="hidden" name="image" id="modal_input-book-image">

                    <div class="mb-3">
                        <label for="modal_input-book-id" class="form-label">Mã sách</label>
                        <input name="id" required autocomplete="off" type="text" readonly class="form-control"
                            id="modal_input-book-id">
                    </div>

                    <div class="mb-3">
                        <label for="modal_input-book-name" class="form-label">Tên sách</label>
                        <input name="name" required autocomplete="off" type="text" readonly class="form-control"
                            id="modal_input-book-name">
                    </div>


                    <div class="mb-3">
                        <label for="modal_input-user-name" class="form-label">Người mượn</label>
                        <input required name="username" autocomplete="off" type="text" class="form-control"
                            id="modal_input-user-name" placeholder="Người mượn">
                    </div>


                    <div class="mb-3">
                        <label for="modal_input-start-time"> Ngày mượn:</label>
                        <input required name="startTime" autocomplete="off" type="date" class="form-control "
                            id="modal_input-start-time" placeholder="Ngày mượn">
                    </div>

                    <div class="mb-3">
                        <label for="modal_input-end-time">Ngày trả:</label>
                        <input required name="endTime" autocomplete="off" type="date" class="form-control "
                            id="modal_input-end-time" placeholder="Ngày trả">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                <button type="submit" class="btn btn-primary">Thêm</button>
            </div>
        </div>
    </div>
</form>