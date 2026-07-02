document.querySelectorAll(".file-input").forEach((input) => {
  input.addEventListener("change", function () {
    const fileNameElement =
      this.closest(".custom-upload").querySelector(".file-name");

    if (this.files.length > 0) {
      fileNameElement.textContent = this.files[0].name;
    }
  });
});
