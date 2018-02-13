$(document).ready(function(){
	$('.btn_search').click(function(){
		var tukhoa = $('#tukhoa').val();
		if(tukhoa.lenght != 0){
			var url = 'https://www.5giay.com/search.aspx?category=0&query='+tukhoa+'&type=1';
			window.open(url,'_blank');
		}
		else
			return false;
	});
	$('#tukhoa').keypress(function (e) {
	 var key = e.which;
	 if(key == 13) 
	  {
		$('.btn_search').click();
		return false;  
	  }
	}); 
})