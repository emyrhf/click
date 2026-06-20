const menu = document.getElementById("menu");
const imageInput = document.getElementById("imagemAdicionada");
const imagem = document.getElementById("imagePreview");

function toggleMenu() {
    menu.classList.toggle("active");
}

function mudarImagem() {
    console.log("mudou");
    const [arquivo] = imageInput.files;
    console.log(arquivo);
    imagem.classList.add("active");

    if (arquivo) {
        imagem.src = URL.createObjectURL(arquivo);
    }
}

function redirecionar(url) {
    window.location.href = url;
}
