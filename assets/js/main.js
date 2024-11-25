document.addEventListener("DOMContentLoaded", function () {
    setShareLinks();

    function socialWindow(url) {
        var left = (screen.width - 570) / 2;
        var top = (screen.height - 570) / 2;
        var params =
            "menubar=no,toolbar=no,status=no,width=570,height=570,top=" +
            top +
            ",left=" +
            left;
        window.open(url, "NewWindow", params);
    }

    function setShareLinks() {
        var pageUrl = encodeURIComponent(window.location.href);

        var socialLinks = document.querySelectorAll(".social-share");
        socialLinks.forEach(function (link) {
            link.addEventListener("click", function (event) {
                event.preventDefault();
                var socialNetwork = this.classList[1];
                var shareUrl = "";

                switch (socialNetwork) {
                    case "linkedin":
                        shareUrl = "https://www.linkedin.com/shareArticle?mini=true&url=" + pageUrl;
                        break;
                    case "facebook":
                        shareUrl = "https://www.facebook.com/sharer.php?u=" + pageUrl;
                        break;
                    case "twitter":
                        shareUrl = "https://twitter.com/intent/tweet?url=" + pageUrl;
                        break;
                    default:
                        break;
                }

                socialWindow(shareUrl);
            });
        });
    }
});



// Dynamic Adapt v.1
// HTML data-da="where(uniq class name),position(digi),when(breakpoint)"
// e.x. data-da="item,2,992"

"use strict";

(function () {
    let originalPositions = [];
    let daElements = document.querySelectorAll('[data-da]');
    let daElementsArray = [];
    let daMatchMedia = [];
    //Заполняем массивы
    if (daElements.length > 0) {
        let number = 0;
        for (let index = 0; index < daElements.length; index++) {
            const daElement = daElements[index];
            const daMove = daElement.getAttribute('data-da');
            if (daMove != '') {
                const daArray = daMove.split(',');
                const daPlace = daArray[1] ? daArray[1].trim() : 'last';
                const daBreakpoint = daArray[2] ? daArray[2].trim() : '767';
                const daType = daArray[3] === 'min' ? daArray[3].trim() : 'max';
                const daDestination = document.querySelector('.' + daArray[0].trim())
                if (daArray.length > 0 && daDestination) {
                    daElement.setAttribute('data-da-index', number);
                    //Заполняем массив первоначальных позиций
                    originalPositions[number] = {
                        "parent": daElement.parentNode,
                        "index": indexInParent(daElement)
                    };
                    //Заполняем массив элементов
                    daElementsArray[number] = {
                        "element": daElement,
                        "destination": document.querySelector('.' + daArray[0].trim()),
                        "place": daPlace,
                        "breakpoint": daBreakpoint,
                        "type": daType
                    }
                    number++;
                }
            }
        }
        dynamicAdaptSort(daElementsArray);

        //Создаем события в точке брейкпоинта
        for (let index = 0; index < daElementsArray.length; index++) {
            const el = daElementsArray[index];
            const daBreakpoint = el.breakpoint;
            const daType = el.type;

            daMatchMedia.push(window.matchMedia("(" + daType + "-width: " + daBreakpoint + "px)"));
            daMatchMedia[index].addListener(dynamicAdapt);
        }
    }
    //Основная функция
    function dynamicAdapt(e) {
        for (let index = 0; index < daElementsArray.length; index++) {
            const el = daElementsArray[index];
            const daElement = el.element;
            const daDestination = el.destination;
            const daPlace = el.place;
            const daBreakpoint = el.breakpoint;
            const daClassname = "_dynamic_adapt_" + daBreakpoint;

            if (daMatchMedia[index].matches) {
                //Перебрасываем элементы
                if (!daElement.classList.contains(daClassname)) {
                    let actualIndex = indexOfElements(daDestination)[daPlace];
                    if (daPlace === 'first') {
                        actualIndex = indexOfElements(daDestination)[0];
                    } else if (daPlace === 'last') {
                        actualIndex = indexOfElements(daDestination)[indexOfElements(daDestination).length];
                    }
                    daDestination.insertBefore(daElement, daDestination.children[actualIndex]);
                    daElement.classList.add(daClassname);
                }
            } else {
                //Возвращаем на место
                if (daElement.classList.contains(daClassname)) {
                    dynamicAdaptBack(daElement);
                    daElement.classList.remove(daClassname);
                }
            }
        }
        customAdapt();
    }

    //Вызов основной функции
    dynamicAdapt();

    //Функция возврата на место
    function dynamicAdaptBack(el) {
        const daIndex = el.getAttribute('data-da-index');
        const originalPlace = originalPositions[daIndex];
        const parentPlace = originalPlace['parent'];
        const indexPlace = originalPlace['index'];
        const actualIndex = indexOfElements(parentPlace, true)[indexPlace];
        parentPlace.insertBefore(el, parentPlace.children[actualIndex]);
    }
    //Функция получения индекса внутри родителя
    function indexInParent(el) {
        var children = Array.prototype.slice.call(el.parentNode.children);
        return children.indexOf(el);
    }
    //Функция получения массива индексов элементов внутри родителя
    function indexOfElements(parent, back) {
        const children = parent.children;
        const childrenArray = [];
        for (let i = 0; i < children.length; i++) {
            const childrenElement = children[i];
            if (back) {
                childrenArray.push(i);
            } else {
                //Исключая перенесенный элемент
                if (childrenElement.getAttribute('data-da') == null) {
                    childrenArray.push(i);
                }
            }
        }
        return childrenArray;
    }
    //Сортировка объекта
    function dynamicAdaptSort(arr) {
        arr.sort(function (a, b) {
            if (a.breakpoint > b.breakpoint) { return -1 } else { return 1 }
        });
        arr.sort(function (a, b) {
            if (a.place > b.place) { return 1 } else { return -1 }
        });
    }
    //Дополнительные сценарии адаптации
    function customAdapt() {
        //const viewport_width = Math.max(document.documentElement.clientWidth, window.innerWidth || 0);
    }
}());

jQuery(document).ready(function ($) {
    var TabBlock = {
        s: {
            animLen: 200
        },

        init: function () {
            TabBlock.bindUIActions();
            TabBlock.hideInactive();
        },

        bindUIActions: function () {
            $('.tabBlock-tabs').on('click', '.tabBlock-tab', function () {
                TabBlock.switchTab($(this));
            });
        },

        hideInactive: function () {
            var $tabBlocks = $('.tabBlock');

            $tabBlocks.each(function (i) {
                var
                    $tabBlock = $($tabBlocks[i]),
                    $panes = $tabBlock.find('.tabBlock-pane'),
                    $activeTab = $tabBlock.find('.tabBlock-tab.is-active');

                $panes.hide();
                $($panes[$activeTab.index()]).show();
            });
        },

        switchTab: function ($tab) {
            var $context = $tab.closest('.tabBlock');

            if (!$tab.hasClass('is-active')) {
                $tab.siblings().removeClass('is-active');
                $tab.addClass('is-active');

                TabBlock.showPane($tab.index(), $context);
                saveActiveTab();
            }
        },

        showPane: function (i, $context) {
            var $panes = $context.find('.tabBlock-pane');

            // Normally I'd frown at using jQuery over CSS animations, but we can't transition between unspecified variable heights, right? If you know a better way, I'd love a read it in the comments or on Twitter @johndjameson
            $panes.slideUp(TabBlock.s.animLen);
            $($panes[i]).slideDown(TabBlock.s.animLen);
        }
    };

    // Функція для збереження активної вкладки в localStorage
    function saveActiveTab() {
        var activeTabIndex = $('.tabBlock-tab.is-active').index();
        localStorage.setItem('activeTabIndex', activeTabIndex);
    }

    // Функція для відновлення активної вкладки з localStorage
    function restoreActiveTab() {
        var activeTabIndex = localStorage.getItem('activeTabIndex');
        if (activeTabIndex !== null) {
            $('.tabBlock-tab').removeClass('is-active').eq(activeTabIndex).addClass('is-active');
            $('.tabBlock-pane').hide().eq(activeTabIndex).show();
        }
    }

    // Виклик функцій для збереження та відновлення активної вкладки
    restoreActiveTab();

    // Ініціалізація табів
    TabBlock.init();
});



//


window.addEventListener('scroll', function () {
    var header = document.querySelector('.header');

    if (window.scrollY > 30) {
        header.classList.add('scrolled');
    } else {
        header.classList.remove('scrolled');
    }
});


// menu

jQuery(document).ready(function ($) {
    const navbarMenu = document.getElementById("menu");
    const burgerMenu = document.getElementById("burger");
    const headerMenu = document.getElementById("header");

// Open Close Navbar Menu on Click Burger
    if (burgerMenu && navbarMenu && headerMenu) {
        burgerMenu.addEventListener("click", () => {
            burgerMenu.classList.toggle("is-active");
            navbarMenu.classList.toggle("is-active");
            headerMenu.classList.toggle("is-active");
        });
    }

// Close Navbar Menu on Click Menu Links
    document.querySelectorAll(".menu-link").forEach((link) => {
        link.addEventListener("click", () => {
            burgerMenu.classList.remove("is-active");
            navbarMenu.classList.remove("is-active");
        });
    });

// Change Header Background on Scrolling
    window.addEventListener("scroll", () => {
        if (this.scrollY >= 85) {
            headerMenu.classList.add("on-scroll");
        } else {
            headerMenu.classList.remove("on-scroll");
        }
    });

// Fixed Navbar Menu on Window Resize
    window.addEventListener("resize", () => {
        if (window.innerWidth > 768) {
            if (navbarMenu.classList.contains("is-active")) {
                navbarMenu.classList.remove("is-active");
            }
        }
    });

});




jQuery(document).ready(function($) {

    const modals = document.querySelectorAll("[data-modal]");

    modals.forEach(function (trigger) {
        trigger.addEventListener("click", function (event) {
            event.preventDefault();
            const modal = document.getElementById(trigger.dataset.modal);
            modal.classList.add("open");
            const exits = modal.querySelectorAll(".modal-exit");
            exits.forEach(function (exit) {
                exit.addEventListener("click", function (event) {
                    event.preventDefault();
                    modal.classList.remove("open");
                });
            });
        });
    });

});

const swipernews = new Swiper('.slider_image', {
    slidesPerView: 4,
    spaceBetween: 30,
    loop: true,
    breakpoints: {
        // when window width is >= 320px
        320: {
            slidesPerView: 1,
            slidePerView: 1,
            spaceBetween: 0
        },
        768: {
            slidesPerView: 1,
            slidePerView: 1,
            spaceBetween: 0
        },
        1024: {
            slidesPerView: 4,
            slidePerView: 4,
            spaceBetween: 30
        },

    }
});

document.addEventListener('DOMContentLoaded', function() {
    const videos = document.querySelectorAll('.guarantees_item video');

    videos.forEach(video => {
        video.addEventListener('mouseenter', function() {
            video.play();
        });

        video.addEventListener('mouseleave', function() {
            video.pause();
            video.currentTime = 0; // Повертає відео на початок
        });
    });
});


jQuery(document).ready(function($){
    $('.special_gift_button').click(function(event) {
        $('.special_gift_text').toggleClass('full');
    });
});

