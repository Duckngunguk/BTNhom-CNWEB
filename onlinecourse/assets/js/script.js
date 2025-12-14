document.addEventListener("DOMContentLoaded", () => {
    const deletes = document.querySelectorAll(".btn-delete");

    deletes.forEach(btn => {
        btn.addEventListener("click", e => {
            if (!confirm("Bạn chắc chắn muốn xóa?")) {
                e.preventDefault();
            }
        });
    });
});
