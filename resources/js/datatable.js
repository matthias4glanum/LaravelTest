$(function(){
    $('#member').DataTable({
        language: {
            url: '//cdn.datatables.net/plug-ins/1.13.4/i18n/fr-FR.json',
        },
        initComplete: function(settings) {
        //settings.nTable.id --> Get table ID
        $('#'+settings.nTable.id+'_filter input').wrap(`
            <div class="d-inline-flex position-relative"></div>
        `).after(`
            <button type="button" class="close position-absolute" aria-label="Close" style="right:5px">
            <span aria-hidden="true">&times;</span>
            </button>
        `).attr('required','required').attr('title','Search');

        // Click Event on Clear button
        $(document).on('click', '#'+settings.nTable.id+'_filter button', function(){
            $('#'+settings.nTable.id).DataTable({
            "retrieve": true,
            }).search('').draw(); // reDraw table
        });
        }
    });
});



var myModal = document.getElementById('myModal')
var myInput = document.getElementById('myInput')

myModal.addEventListener('shown.bs.modal', function () {
myInput.focus()
})
