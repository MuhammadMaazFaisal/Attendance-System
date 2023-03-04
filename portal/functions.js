function display(a) {
  console.log("after function");
  console.log("a");
  $.ajax({
    type: "Post",
    url: "result.php",
    data: { a: a },
    success: function (data) {
      $("#table-container").html(data);
    },
  });
}
function modal(id) {
  
  console.log(id);
  $('#exampleModalCenter').modal('show');
    $.ajax({
      type: "Post",
      url: "modal.php",
      data: { function: "modal",
      id:id },
      success: function (data) {
        console.log(data);  
        data=jQuery.parseJSON(data);
        console.log(data);
        let emp_id=document.getElementById("emp_id");
        let emp_name=document.getElementById("emp_name");
        let emp_time=document.getElementById("emp_time");
        let emp_timeout=document.getElementById("emp_timeout");
        let emp_date=document.getElementById("emp_date");
        let emp_status=document.getElementById("emp_status");
        let emp_statusout=document.getElementById("emp_statusout");
        let image=document.getElementById("image");
        console.log(image);
        emp_id.innerHTML=data[0];
        emp_name.innerHTML=data[1];
        emp_time.innerHTML=data[2];
        emp_timeout.innerHTML=data[3];
        emp_date.innerHTML=data[4];
        emp_status.innerHTML=data[5];
        emp_statusout.innerHTML=data[6];
        image.src=data[7][0];

      },
    });
    // window.setTimeout(function () {
    //   $('#exampleModalCenter').modal('hide');
    // }, 2000);


  
}


document.getElementById("input").addEventListener("change", function () {
  id = document.getElementById("input").value;
  if (id == "") {
    console.log("empty");
  } else {
  

  $.ajax({
    type: "Post",
    url: "insert4.php",
    data: {
      id: id
      
    },

    success: function (data) {
      console.log(data);
      
      data = jQuery.parseJSON(data);
      details = data;
      display(id);
      modal(id);
      
      
    },
  });
}
});

