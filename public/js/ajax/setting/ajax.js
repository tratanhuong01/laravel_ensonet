function eventSetting(element) {
    var dt = document.getElementsByClassName('actives');
    var interface = document.getElementsByClassName('interface');
        for (let index = 0; index < dt.length; index++) {
            const el = dt[index];
            if (el == element) {
                interface[index].classList.remove('hidden');
                element.classList.add('on');
                element.classList.add('bg-gray-300')
                element.classList.add('dark:bg-dark-main')
                element.classList.remove('hover:bg-gray-200')
                element.classList.remove('dark:hover:bg-dark-second')
                switch (index) {
                    case 0:
                        window.history.pushState('','','/setting/change-name')
                    break;
                    case 1:
                        window.history.pushState('','','/setting/change-password')
                    break;
                    case 2:
                        window.history.pushState('','','/setting/delete-account')
                    break;
                    default:
                        break;
                }
            }
            else {
                interface[index].classList.add('hidden');
                el.classList.remove('on');
                el.classList.remove('bg-gray-300')
                el.classList.remove('dark:bg-dark-main')
                el.classList.add('hover:bg-gray-200')
                el.classList.add('dark:hover:bg-dark-second')
            }
        }
}
function onchangeVerifyDeleteAccount(element) {
    if (element.checked) { 
        $('#btnDeleteAccount').removeClass('opacity-50 cursor-not-allowed'); 
        $('#btnDeleteAccount').removeAttr('disabled');
    }
    else {
        $('#btnDeleteAccount').addClass('opacity-50 cursor-not-allowed'); 
        $('#btnDeleteAccount').prop('disabled',true);
    }
}