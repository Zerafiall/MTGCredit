
<div class="row">
    <form action="../includes/newTransaction.php" method="post">
    <div class="col-5">
    <input type="number"
            step="0.01"
            name="transAmount"
            placeholder="Change Amount"
			class="form-control p-1">
	</div>
	<div class="col-5">
    <input type="text"
            name="comment"
            placeholder="Comment"
			class="form-control p-1">
    <button type="submit" 
			name="submit"  
            class="btn btn-outline-primary p-1">
		Change
	</button>
	</div>
</div>
</form>

