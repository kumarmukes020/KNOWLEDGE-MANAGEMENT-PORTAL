</div> <!-- END CONTENT CONTAINER -->

<footer class="footer-blue text-center py-3 mt-auto">
    <small>
        © <?= date('Y') ?> NML | KNOWLEDGE MANAGEMENT PORTAL.
    </small>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script>
function showEmoji(value, element){

const form = element.closest(".rating-form");
const bubble = form.querySelector(".emoji-bubble");

let emoji="😊";

if(value==1) emoji="😡";
if(value==2) emoji="😕";
if(value==3) emoji="😐";
if(value==4) emoji="🙂";
if(value==5) emoji="😍";

bubble.innerHTML=emoji;
bubble.classList.add("emoji-show");

setTimeout(()=>{
form.submit();
},800);
}

document.getElementById("fileSearch")?.addEventListener("keyup",function(){

let value=this.value.toLowerCase();

document.querySelectorAll("tbody tr").forEach(function(row){

row.style.display=row.innerText.toLowerCase().includes(value)?"":"none";

});

});
</script>
</body>
</html>