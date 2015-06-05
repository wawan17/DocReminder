function PopupPicker(surl, ctl, qry, w, h) {
    var PopupWindow = null;
    settings = 'width=' + w + ',height=' + h + ',location=no,directories=no,menubar=no,toolbar=no,status=no,scrollbars=no,resizable=no,dependent=no';
    PopupWindow = window.open(surl + ctl + qry, 'Search', settings);
    PopupWindow.focus();
};
