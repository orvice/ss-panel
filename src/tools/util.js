export const bytesToSize = function (bytes) {
    if (bytes === 0) return '0 B';
    const k = 1000, // or 1024
        sizes = ['B', 'KB', 'MB', 'GB', 'TB', 'PB', 'EB', 'ZB', 'YB'],
        i = Math.floor(Math.log(bytes) / Math.log(k));
    return (bytes / Math.pow(k, i)).toPrecision(3) + ' ' + sizes[i];
};

export const timeFormat = function (t) {
};

export const notify = function(message,status){
    UIkit.notification({
        message: message,
        status: status,
        pos: 'top-center',
        timeout: 5000
    });
};