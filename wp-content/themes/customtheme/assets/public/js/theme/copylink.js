export default function copylink () { 
    $(document).on('click', '.copylink', function(e) {
        e.preventDefault(e);
        var inputElement = document.createElement('input');
        inputElement.setAttribute('value', window.location.href);
        document.body.appendChild(inputElement);
        
        // Chọn nội dung của phần tử input
        inputElement.select();
        
        // Sao chép nội dung đã chọn vào clipboard
        document.execCommand('copy');
        
        // Xóa phần tử input
        document.body.removeChild(inputElement);

        $('.coppied').addClass('active');
        setTimeout(() => {
            $('.coppied').removeClass('active');
        }, 2000);
    });
}