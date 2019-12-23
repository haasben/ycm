~function (designWidth) {
	let devW=''
   let computed= function () {
		let desW=750;//设计稿宽度
		devW=document.documentElement.clientWidth;//当前设备的宽度
		console.log(devW)
		if(devW>=750){
			if(devW>=1183){
				document.documentElement.style.fontSize="16px";
				return false;
			}
			document.documentElement.style.fontSize="100px";
			return false;
		}else{
			document.documentElement.style.fontSize=devW/desW*100+"px";
		}
	}
	computed();
	window.addEventListener("resize",computed,false)
}();


// 头部菜单按钮事件
$('.mobile_header').on('click','.menu', function(e){
	// $('.mobile_header .nav').show()
	$('.mobile_header .nav').css({
		'transform': 'translateX(0px)'
	});
	e.stopPropagation();
})

$(document).bind('click', function(){
	// $('.mobile_header .nav').hide()
	$('.mobile_header .children').css('display','none');
	$('.mobile_header .nav').css('transform', 'translateX(500px)');
})
$('.mobile_header .nav').bind("click", function(e){
	e.stopPropagation();
})
$('.mobile_header .nav').on('click', '.par', function(){
 const child = $(this).find('.children');
 const href = $(this).find()
 if(child.length > 0){
  child.toggle()
 }
 else{
  
 }
})

// $(function(){
// 	minHeight()
// })
// $(window).resize(function(){
// 	minHeight()
// })

// function minHeight(){
//  let height = $(window).height()
//  const devW = document.documentElement.clientWidth
//  console.log(height)
//  console.log(devW)
//  let minHeight = height - 222
//  $(".container").css({
//   "min-height":minHeight+"px",
//  })
//  if(devW < 1200){
//   $(".container").css({
//    "min-height":"initial"
//   })
//  }
 
// }