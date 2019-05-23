
$(document).ready(function(){
	var count=1;
	var id;

	$(".header-btn").click(function () {
		count++;
		$(".modi-add").fadeIn(300);
		console.log("Header Button");
			
	});

	$(".modi-add .modi-btn-cncl").click(function () {
		$(".modi-add").fadeOut(300);
	});

	$(".modi-add .modi-btn-save").click(function() {
		var type="add-checklist";
		var value = $(".modi-add .modi-input-field:text").val();

		$(".modi-add .modi-input-field:text").val(null);
		$(".modi-add").fadeOut(300);

		$.ajax({
			url:'add_checklist.php',
			type:'post',
			data:{type:type,value:value},
			success:function(response){
				console.log("Data added");
				window.location.reload();
			}
		});
	});

	$(".remv-btn").click(function() {
		$(this).parents("div[class*='item-container']").remove();
		id=$(this).attr('item-id');

		var type="remove-checklist";
		$.ajax({
			url:'add_checklist.php',
			type:'post',
			data:{type:type,id:id},
			success:function(response){
				console.log("Data removed");
				window.location.reload();
			}
		});
    });	

	
	$(".edit-btn").click(function () {
		$(".modi-edit").fadeIn(300);
		id=$(this).attr('item-id');
		var value=$("label[item-id='" + id + "']").text();
		$(".modi-edit .modi-input-field").val(value);
	});

	$(".modi-edit .modi-btn-cncl").click(function () {
		$(".modi-edit").fadeOut(300);
	});	

	$(".modi-edit .modi-btn-save").click(function() {
		var value = $(".modi-edit .modi-input-field:text").val();
		console.log(value);

		$("label[item-id='" + id + "']").text(value);				
		$("label[item-id='" + id + "']").prepend("<div><i class='fa fa-check'></i></div>");
		$(".modi-edit").fadeOut(300);
		$(".modi-edit .modi-input-field").val("");

		var type="edit-checklist";
		$.ajax({
			url:'add_checklist.php',
			type:'post',
			data:{type:type,id:id,value:value},
			success:function(response){
				console.log("Edited");
				window.location.reload();
			}
		});
	});

	$("#checklist input:checked+label div").click(function(){
		id=$(this).attr('item-id');	
		
		value=2;

		var type="check-checklist";
		$.ajax({
			url:'add_checklist.php',
			type:'post',
			data:{type:type,id:id,value:value},
			success:function(response){
				console.log("success");
			}
		});

	});

	$("#checklist label div").click(function(){
		id=$(this).attr('item-id');		

		value=1;

		var type="check-checklist";
		$.ajax({
			url:'add_checklist.php',
			type:'post',
			data:{type:type,id:id,value:value},
			success:function(response){
				console.log("success");
			}
		});

	});
	
});

$(document).ready(function(){
$('.toggle').click(function(e) {
    e.preventDefault();

  var $this = $(this);

  if ($this.next().hasClass('show')) {
      $this.next().removeClass('show');
      $this.next().slideUp(350);
  } else {
      $this.parent().parent().find('li .inner').removeClass('show');
      $this.parent().parent().find('li .inner').slideUp(350);
      $this.next().toggleClass('show');
      $this.next().slideToggle(350);
  }
});
});






