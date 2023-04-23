const sideMenu = document.querySelector("aside")
const Menu = document.querySelector("menu")
const menuBtn = document.querySelector("#menu-btn")
const closeBtn = document.querySelector("#close-btn")
const chemeToggler = document.querySelector(".theme-toggler")

menuBtn.addEventListener("click", () => {
    sideMenu.style.display = "block";
})

function func() {
    Menu.style.display = "block";
}

function func0() {
    window.location.href = 'dashboard.php';
}

function func44() {
    window.location.href = 'customers.php';
}

function func1() {
    document.querySelector(".webhooks").style.display = "block"
    document.querySelector(".general").style.display = "none"
    document.querySelector(".general2").style.display = "none"
    document.querySelector(".general33").style.display = "none"
    // document.querySelector(".explosion").style.display = "none"
        // document.querySelector(".tables").style.display = "none"
    // document.querySelector(".framework").style.display = "none"
    document.getElementById("2").classList.remove("activeborder");
    // document.getElementById("3").classList.remove("activeborder");
    // document.getElementById("4").classList.remove("activeborder");
    // document.getElementById("6").classList.remove("activeborder");
    // document.getElementById("5").classList.remove("activeborder");
    const next = document.getElementById("1");
    next.classList.add("activeborder");
}

function func2() {
    document.querySelector(".webhooks").style.display = "none"
    // document.querySelector(".explosion").style.display = "none"
    document.querySelector(".general").style.display = "block"
    document.querySelector(".general2").style.display = "block"
    document.querySelector(".general33").style.display = "block"
        // document.querySelector(".tables").style.display = "none"
    // document.querySelector(".framework").style.display = "none"
     document.getElementById("1").classList.remove("activeborder");
    // document.getElementById("3").classList.remove("activeborder");
   // document.getElementById("4").classList.remove("activeborder");
    // document.getElementById("5").classList.remove("activeborder");
    // document.getElementById("6").classList.remove("activeborder");
    const next = document.getElementById("2");
    next.classList.add("activeborder");
}

// function func3() {
//     document.querySelector(".webhooks").style.display = "none"
//     document.querySelector(".general").style.display = "none"
//     document.querySelector(".general2").style.display = "none"
//     document.querySelector(".general33").style.display = "none"
//     document.querySelector(".explosion").style.display = "none"
//         // document.querySelector(".tables").style.display = "none"
//     document.querySelector(".framework").style.display = "none"
//     document.getElementById("2").classList.remove("activeborder");
//     document.getElementById("1").classList.remove("activeborder");
//     document.getElementById("4").classList.remove("activeborder");
//     // document.getElementById("5").classList.remove("activeborder");
//     // document.getElementById("6").classList.remove("activeborder");
//     const next = document.getElementById("3");
//     next.classList.add("activeborder");
// }

// function func4() {
//     document.querySelector(".webhooks").style.display = "none"
//     document.querySelector(".general2").style.display = "none"
//     document.querySelector(".general").style.display = "none"
//     document.querySelector(".general33").style.display = "none"
//     document.querySelector(".explosion").style.display = "block"
//         // document.querySelector(".tables").style.display = "none"
//     document.querySelector(".framework").style.display = "none"
//     document.getElementById("2").classList.remove("activeborder");
//     // document.getElementById("5").classList.remove("activeborder");
//     // document.getElementById("6").classList.remove("activeborder");
//     // document.getElementById("3").classList.remove("activeborder");
//     document.getElementById("1").classList.remove("activeborder");
//     const next = document.getElementById("4");
//     next.classList.add("activeborder");
// }

// function func5() {
//     document.querySelector(".webhooks").style.display = "none"
//     document.querySelector(".general").style.display = "none"
//     document.querySelector(".general2").style.display = "none"
//     document.querySelector(".general33").style.display = "none"
//     document.querySelector(".explosion").style.display = "none"
//         // document.querySelector(".tables").style.display = "block"
//     document.querySelector(".framework").style.display = "none"
//     document.getElementById("2").classList.remove("activeborder");
//     document.getElementById("1").classList.remove("activeborder");
//     document.getElementById("4").classList.remove("activeborder");
//     // document.getElementById("6").classList.remove("activeborder");
//     const next = document.getElementById("5");
//     next.classList.add("activeborder");
// }

// function func6() {
//     document.querySelector(".webhooks").style.display = "none"
//     document.querySelector(".general").style.display = "none"
//     document.querySelector(".general2").style.display = "none"
//     document.querySelector(".general33").style.display = "none"
//     document.querySelector(".explosion").style.display = "none"
//         // document.querySelector(".tables").style.display = "none"
//     document.querySelector(".framework").style.display = "block"
//     document.getElementById("2").classList.remove("activeborder");
//     document.getElementById("1").classList.remove("activeborder");
//     document.getElementById("4").classList.remove("activeborder");
//     // document.getElementById("5").classList.remove("activeborder");
//     const next = document.getElementById("6");
//     next.classList.add("activeborder");
// }

closeBtn.addEventListener("click", () => {
    sideMenu.style.display = "none";
})

chemeToggler.addEventListener("click", () => {
    document.body.classList.toggle("dark-theme")
    chemeToggler.querySelector("span").classList.toggle("active")
    localStorage.setItem("PageTheme", JSON.stringify(chemeToggler.querySelector("span").classList.contains("active")));
})

let GetTheme = JSON.parse(localStorage.getItem("PageTheme"));
if (GetTheme == false) {
    document.body.classList.toggle("dark-theme")
    chemeToggler.querySelector("span").classList.toggle("active")
}





