<form action="../includes/newTransaction.php" method="post">

<div class="row">
	<div class="col-md-6 col-fluid p-1">
    <input type="text"
            name="comment"
            placeholder="Comment"
			class="form-control">
	</div>
    <div class="col-md-4 col-fluid p-1">
		<input	type="number"
				step="0.01"
				name="transAmount"
				placeholder="Change Amount"
				class="form-control">
	</div>
    <div class="col-md-2 col-fluid p-1">
    <button type="submit" 
			name="submit"  
            class="btn btn-outline-primary">
		Change
	</button>
	</div>
</div>
</form>

