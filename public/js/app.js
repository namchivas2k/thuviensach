const handelAddData = (e) => {
  $("#exampleModal")[0].reset();
  $("#modal_input-book-id").val(e.target.getAttribute("data-book-id"));
  $("#modal_input-book-name").val(e.target.getAttribute("data-book-name"));
  $("#modal_input-book-image").val(e.target.getAttribute("data-book-image"));
};

$(window).ready(() => {
  $(".btn-borrow").click(handelAddData);

  $("#exampleModal").submit(async (e) => {
    e.preventDefault();

    const bookData = JSON.parse('{"' + decodeURI($("#exampleModal").serialize().replace(/&/g, '","').replace(/=/g, '":"')) + '"}');

    $.post("/muon-sach", JSON.stringify(bookData)).then((data) => {
      alert(data ? "Mượn thành công" : "Mượn thất bại");
      $("#exampleModal").modal("hide");
      location.reload();
    });
  });

  //
  $(".btn-confirm-borrowed").click((e) => {
    if (confirm("Xác nhận xoá khỏi danh sách 'Sách đã mượn' ? ")) {
      const bookID = e.target.getAttribute("data-book-id");
      const bID = e.target.getAttribute("data-borrow-id");

      $.post("/tra-sach", JSON.stringify({ bID, bookID }), (data) => {
        console.log(data);
        alert(data ? "Thành công" : "Thất bại");
        location.reload();
      });
    }
  });
});
