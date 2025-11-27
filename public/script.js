document.querySelectorAll('.mark-answered').forEach(btn=>{
    btn.addEventListener('click',function(){
        let id=this.getAttribute('data-id');
        fetch('mark_answered.php',{
            method:'POST',
            headers:{'Content-Type':'application/x-www-form-urlencoded'},
            body:'id='+id
        }).then(res=>res.text()).then(data=>{
            if(data=='answered'){
                document.getElementById('status-'+id).innerText='answered';
                this.style.display='none';
            }
        });
    });
});
