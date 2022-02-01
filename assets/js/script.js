const mainUrl = "http://localhost/oop_CS";

function remove(name, id) {

    if (confirm('Вы действительно хотите удалить эту запись?')) {
        window.location.href = `${mainUrl}/${name}/delete/${id}`;
    }
}

const mark = document.getElementById("my-mark");
console.log(mark);
const marks = document.querySelectorAll("#my-mark .fa-star")
if (mark) {
    mark.addEventListener('mouseover', (event) => {
        const currentMark = event.target.dataset['mark'];
        if (currentMark) {
            marks.forEach((markElem) => {
                const currentMarkElem = markElem.dataset['mark'];
                if (currentMarkElem <= currentMark) {
                    markElem.classList.remove('far');
                    markElem.classList.add('fas');
                } else {
                    markElem.classList.add('far');
                    markElem.classList.remove('fas');
                }
            })
        }
    })
}

function candleEvaluate(candleId) {
    const mark = document.querySelectorAll("#my-mark .fas").length;
    const request = new XMLHttpRequest();
    request.open("GET", `${mainUrl}/candle/mark/${candleId}/${mark}`);
    request.send();
    request.onreadystatechange = function () {
        if (request.readyState === 4 && request.status === 200) {
            const container = document.getElementById('my-mark');
            let content = "";
            if (request.responseText === "0") {
                content = "Вы успешно проголосовали";
            } else {
                content = request.responseText;
            }
            container.innerText = content;
        }
    };

}

function setCookie(name, value, days) {
    let expires = "";
    if (days) {
        let date = new Date();
        date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
        expires = "; expires=" + date.toUTCString();
    }
    document.cookie = name + "=" + (value || "") + expires + "; path=/";
}

function getCookie(name) {
    let matches = document.cookie.match(new RegExp("(?:^|; )" + name.replace(/([\.$?*|{}\(\)\[\]\\\/\+^])/g, '\\$1') + "=([^;]*)"));
    return matches ? decodeURIComponent(matches[1]) : undefined;
}


function checkCookies() {
    let cookieNote = document.getElementById('cookie_note');
    let cookieBtnAccept = cookieNote.querySelector('.cookie_accept');

    // Если куки cookies_policy нет или она просрочена, то показываем уведомление
    if (!getCookie('cookies_policy')) {
        cookieNote.classList.add('show');
    }

    // При клике на кнопку устанавливаем куку cookies_policy на один год
    cookieBtnAccept.addEventListener('click', function () {
        setCookie('cookies_policy', 'true', 365);
        cookieNote.classList.remove('show');
    });
}

checkCookies();