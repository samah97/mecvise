var URLROOT = document.getElementById('URLROOT');
function retrieveMajors(){
    var universityId = $('#university').val();
    console.log(universityId);
    clearDDL('major');
    $.ajax({
        url:'ajax/majors',
        method:'POST',
        data: {'university_id':universityId},
        success: function(data,status,xhr){
            var json = JSON.parse(data);
            var o = null;
            /// jquerify the DOM object 'o' so we can use the html method
            //$(o).html("option text");
            
            for(var i=0;i<json.length;i++){
                console.log(json[i].Major_id+"==>"+json[i].Major_Name);
                o = new Option(json[i].Major_Name, json[i].Major_id);
                $("#major").append(o);
            }
            
        }
    });
}

function retrieveProvinces(){
    var countryId = $('#country').val();
    console.log(countryId);
    clearDDL('province');
    $.ajax({
        url:'ajax/provinces',
        method:'POST',
        data: {'country_id':countryId},
        success: function(data,status,xhr){
            var json = JSON.parse(data);
            var o = null;
            /// jquerify the DOM object 'o' so we can use the html method
            //$(o).html("option text");

            for(var i=0;i<json.length;i++){
                //console.log(json[i].Major_id+"==>"+json[i].Major_Name);
                o = new Option(json[i].name,json[i].province_id);
                $("#province").append(o);
            }
        }
    });
}

function retrieveCities(){
    var provinceId = $('#province').val();
    clearDDL('city');
    $.ajax({
        url:'ajax/cities',
        method:'POST',
        data: {'province_id':provinceId},
        success: function(data,status,xhr){
            var json = JSON.parse(data);
            var o = null;
            /// jquerify the DOM object 'o' so we can use the html method
            //$(o).html("option text");

            for(var i=0;i<json.length;i++){
                //console.log(json[i].Major_id+"==>"+json[i].Major_Name);
                o = new Option(json[i].name,json[i].city_id);
                $("#city").append(o);
            }
        }
    });
}

function retrieveBranches(){
    var universityId = $('#university').val();
    clearDDL('branch');
    $.ajax({
        url:'ajax/branches',
        method:'POST',
        data: {'university_id':universityId},
        success: function(data,status,xhr){
            var json = JSON.parse(data);
            var o = null;
            /// jquerify the DOM object 'o' so we can use the html method
            //$(o).html("option text");

            for(var i=0;i<json.length;i++){
                //console.log(json[i].Major_id+"==>"+json[i].Major_Name);
                o = new Option(json[i].name,json[i].branch_id);
                $("#branch").append(o);
            }
        }
    });
}

function clearDDL(id) {
    var select = document.getElementById(id);
    var length = select.options.length;
    for (i = length; i > 0; i--) {
        select.options[i] = null;
    }
}

function changeLatestTopic() {
    var postId = document.getElementById('latest-topic').value;
    if(postId != '' && !isNaN(postId)){
        window.location.href = 'post/create/'+postId;
    }
}

function filterTag() {
    var tag = document.getElementById('filter-tag').value;
    window.location.href = 'post?tag='+tag;
}
$(document).ready(function () {
    $('.edit-logo').click(function () {
        var parent = $(this).parents('.parent-container');
        parent.find('.display-element').addClass('d-none');

        var input = parent.find('.editable-element');
        input.removeAttr('disabled');
        input.removeClass('d-none');
    });
});
