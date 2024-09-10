document.addEventListener('DOMContentLoaded', function() {
    var alert = document.getElementById('alert_success');
    if (alert) {
        setTimeout(() => {
            alert.classList.add('hidealert');

            setTimeout(() => {
                alert.classList.add('displaynone');
            }, 1000);
        }, 3000);
    }
});
