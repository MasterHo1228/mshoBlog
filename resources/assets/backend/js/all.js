/**
 * Created by MasterHo on 2017/1/29.
 */
window.$ = window.jQuery = require('jquery');
require('bootstrap-sass');
require('datatables.net');
require('datatables.net-bs');
require('icheck');
require('selectize');
require('admin-lte');

$(document).ready(function () {
    $(".ajax_load").click(function () {
        Pace.restart();
    });

    if ($("#articleTags").length > 0) {
        $('#articleTags').selectize({
            delimiter: ',',
            persist: false,
            valueField: 'tag',
            labelField: 'tag',
            searchField: 'tag',
            options: tags,
            create: function (input) {
                return {
                    tag: input
                }
            }
        });
    }
});