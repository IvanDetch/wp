const cookiesOptions = document.querySelectorAll('.cookies-ru-header-option')
const cookiesTexts = document.querySelectorAll('.cookies-ru-main-block-text')
const settingButton = document.querySelector('.cookies-ru-buttons-block-settings')
const detailsOption = document.querySelector('#details')
const moreInfoButton = document.querySelector('.more-info')
const agreeButton = document.querySelector('.cookies-ru-buttons-block-agree')
const disagreeButton = document.querySelector('.cookies-ru-buttons-block-disagree')
const saveAndSubmitCokkieSettingsButton = document.querySelector('.ru-cookies-save-settings')
const toggleButtons = document.querySelectorAll('.toggle-button');
const cookiesDetailsArrows = document.querySelectorAll('.ru-cookies-details-settings')

if (localStorage.getItem('disableYaCounter') === 'true') {
    disableCounter()
} else {
    var messageElement = document.querySelector('.cookies-ru');
    // Если нет cookies, то показываем плашку
    if (!Cookies.get('agreement')) {
        messageElement.classList.remove('cookie-notification_hidden_yes')
    } else {
        initCounter();
    }

    // Нажатие кнопки "Я согласен"
    agreeButton.addEventListener('click', function () {
        localStorage.setItem('acceptedCokies', JSON.stringify(getCookiesNames()));
        initCounter();
    });
    // Нажатие кнопки "Я отказываюсь"
    disagreeButton.addEventListener('click', function () {
        declineCookies()
    });

    function declineCookies() {
        const notAcceptedCookies = getCookiesNames()
        notAcceptedCookies.forEach(el => {
            if (!Cookies.get(`${el}`)) {
                Cookies.remove(`${el}`);
            }
        })
        localStorage.setItem('disableYaCounter', 'true');
        localStorage.setItem('acceptedCokies', '[]');
        disableCounter();
    }
    // Настройка определенных куков
    saveAndSubmitCokkieSettingsButton.addEventListener('click', () => {
        const subToggles = document.querySelectorAll('.toggle-button.sub-toggle')
        const acceptedCookies = []
        const notAcceptedCookies = []
        subToggles.forEach(el => {
            if (Array.from(el.classList).includes('on')) {
                acceptedCookies.push(el.id)
            } else (
                notAcceptedCookies.push(el.id)
            )
        })


        if (acceptedCookies.length > 0) {
            localStorage.setItem('acceptedCokies', JSON.stringify(acceptedCookies));
            if (acceptedCookies.includes('TNK_visit')) {
                initCounter()
            } else {
                disableCounter()
            }
        } else {
            disableCounter()
        }
        if (acceptedCookies.length === 0) {
            localStorage.setItem('acceptedCokies', '[]');
        }
        if (notAcceptedCookies.length > 0) {
            notAcceptedCookies.forEach(el => {
                if (!Cookies.get(`${el}`)) {
                    Cookies.remove(`${el}`);
                }
            })
        }
    })
}

function saveAnswer () {
    // Прячем предупреждение
    messageElement.classList.add('cookie-notification_hidden_yes')
    // Ставим cookies
    Cookies.set('agreement', '1');
}

function initCounter () {
    publishScript();
    saveAnswer();
}

// Отказ от сбора куков
function disableCounter() {
    localStorage.setItem('disableYaCounter', 'true')
    messageElement.classList.add('cookie-notification_hidden_yes')

}

function getCookiesNames() {
    const subToggles = document.querySelectorAll('.sub-toggle')
    return Array.from(subToggles).map(el => {
        return el.id
    })
}

settingButton.addEventListener('click', () => {
    changeVisibility(cookiesOptions)
    changeVisibility(cookiesTexts)
    addVisibility(detailsOption)
})

moreInfoButton.addEventListener('click', () => {
    changeVisibility(cookiesOptions)
    changeVisibility(cookiesTexts)
    addVisibility(detailsOption)
})

cookiesOptions.forEach(cookiesOption => {
    cookiesOption.addEventListener('click', () => {
        changeVisibility(cookiesOptions)
        changeVisibility(cookiesTexts)
        addVisibility(cookiesOption)
    })
})

function changeVisibility(array) {
    array.forEach(el => {
        el.classList.remove('chosen')
    })
}
function addVisibility(el) {
    el.classList.add('chosen')
    const elId = el.id
    const textBlock = document.querySelector(`.cookies-ru-main-block-text.${elId}`);
    textBlock.classList.add('chosen')
}

toggleButtons.forEach(toggleButton => {
    toggleButton.addEventListener('click', function() {
        toggleButton.classList.toggle('on');

        if (Array.from(toggleButton.classList).includes('main-toggle-button')) {
            const subToggles = toggleButton.closest('.cookies-details-option').querySelector('.cookies-ru-table').querySelectorAll('.toggle-button')
            subToggles.forEach(subToggle => {
                subToggle.classList.toggle('on')
            })
        } else {
            const subToggles = toggleButton.closest('tbody').querySelectorAll('.toggle-button')
            let allChoisesIsTrue = true
            subToggles.forEach(subToggle => {
                if (!Array.from(subToggle.classList).includes('on')) {
                    allChoisesIsTrue = false
                    return
                }
            })

            const parentToggle = toggleButton.closest('.cookies-details-option').querySelector('.main-toggle-button')

            if (allChoisesIsTrue) {
                parentToggle.classList.add('on')
            } else {
                parentToggle.classList.remove('on')
            }
        }
    });
})

// Отображение подробных настроек
cookiesDetailsArrows.forEach(detailEl => {
    detailEl.addEventListener('click', () => {
        const table = detailEl.closest('.cookies-details-option').querySelector('.cookies-ru-table')
        if (Array.from(table.classList).includes('visible')) {
            detailEl.classList.remove('active')
            table.classList.remove('visible')
        } else {
            detailEl.classList.add('active')
            table.classList.add('visible')
        }
    })
})

function publishScript() {
    const script = document.createElement("script");
    script.textContent = `
        (function(m,e,t,r,i,k,a){m[i]=m[i]||function(){(m[i].a=m[i].a||[]).push(arguments)};
        m[i].l=1*new Date();
        for (var j = 0; j < document.scripts.length; j++) {if (document.scripts[j].src === r) { return; }}
        k=e.createElement(t),a=e.getElementsByTagName(t)[0],k.async=1,k.src=r,a.parentNode.insertBefore(k,a)})
        (window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym");
    
        ym(10288858, "init", {
            clickmap:false,
            trackLinks:true,
            accurateTrackBounce:true
        });
    `
    document.body.appendChild(script);
}

