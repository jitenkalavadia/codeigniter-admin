jQuery(document).ready(function() {
    jQuery('#employee-table').DataTable({
        "pageLength" : 10,
        "ajax": {
            url : base_url+"employee/employee_list",
            type : 'GET'
        },
    });
});
