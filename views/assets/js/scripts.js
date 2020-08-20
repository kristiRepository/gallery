$('.ima').on("click",function(){
    photo=$(this).attr('id');
    album=$(this).attr('album');
    $.ajax({
                    url:"/slider/?photo="+photo+"&album="+album,
                    method:"GET",
                   success:function(data){
                     $('#carouselExampleControls').html($(data).find('#carouselExampleControls'));
      }});
   });

      function d(photo,album) {

        var photoId=photo;
        var albumId=album;
        $.ajax({
            url:"/Gallery/photo/delete",
            method:"POST",
            data:{
                photoId:photoId,
                albumId:albumId
            },
            success:function(data){
             $('#container').html($(data).find('#container'));
            }
        })
     }

     function handleDelete(id) {

        var form = document.getElementById('id');
        form.value = id;
        $('#deleteModal').modal('show')
 }

 function display() {
    var x = document.getElementById("dropdown");
    if (x.style.display == "none") {
        x.style.display = "block";
    } else {
        x.style.display = "none";
    }
}



