$(document).ready(function(){
    var trigger = $('#nav ul ul1 li a'),
        container =$('#content');
    trigger.on('click',function(){
        var $this=$(this)
        target=$this.data('target');
        container.load(target+.html);
        return false;
    });
                     
});