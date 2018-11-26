/**
 * ckeditor编辑器插入
 * CKEDITOR
获取内容
CKEDITOR.instances.content.getData();
设置内容
CKEDITOR.instances.content.setData( '<p>This is the editor data.</p>' );
插入内容
CKEDITOR.instances.content.insertHtml("新内容");
插件使用插入内容
$('.ke-content').append('adad')
所见所得模式class=cke_wysiwyg_frame
源代码模式class=cke_source
*/
window.onload = function()
{
	CKEDITOR.replace( 'content' ,{baseFloatZIndex:100,toolbarCanCollapse: true,tabSpaces:4,language:'zh-cn',forcePasteAsPlainText:true,bodyClass:'ke-content',startupFocus:true});
	if($("#excerpt").hasClass("excerpt")){
		CKEDITOR.replace( 'excerpt' ,{toolbarCanCollapse: true, toolbarStartupExpanded: false});
	}
	//需要手动点击其他区域才能实现焦点失去
	CKEDITOR.instances.content.on('blur', function() {
		sendPost();
	});

}
function sendPost() {
	for (instance in CKEDITOR.instances) {
		CKEDITOR.instances[instance].updateElement();
	}
}
function addattach_img(fileurl,imgsrc,aid, width, height, alt){
	if($(".cke_reset").hasClass("cke_source")){
		EmlogMsgNotify('warning','','请先切换到所见所得模式','top right');
	}else if (imgsrc != "") {
		CKEDITOR.instances.content.insertHtml('<a target=\"_blank\" href=\"'+fileurl+'\" id=\"ematt:'+aid+'\"><img src=\"'+imgsrc+'\" title="点击查看原图" alt=\"'+alt+'\" border=\"0\" width="'+width+'" height="'+height+'"/></a>');
	}
}
function addattach_file(fileurl,filename,aid){
	if($(".cke_reset").hasClass("cke_source")){
		EmlogMsgNotify('warning','','请先切换到所见所得模式','top right');
	} else {
		CKEDITOR.instances.content.insertHtml('<span class=\"attachment\"><a target=\"_blank\" href=\"'+fileurl+'\" >'+filename+'</a></span>');
	}
}

