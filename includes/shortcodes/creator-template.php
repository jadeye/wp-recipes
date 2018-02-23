<div id="recipe-status"></div>
<form id="recipe-form">
	<div class="form-group">
		<label>Title</label>
		<input type="text" class="form-control" id="r_inputTitle">
	</div>
	CONTENT_EDITOR
	<div class="form-group">
		<label>Ingredients</label>
		<input type="text" class="form-control" id="r_inputIngredients">
	</div>
	<div class="form-group">
		<label>Cooking Time Required</label>
		<input type="text" class="form-control" id="r_inputTime">
	</div>
	<div class="form-group">
		<label>Cooking Utensils</label>
		<input type="text" class="form-control" id="r_inputUtensils">
	</div>
	<div class="form-group">
		<label>Cooking Experience</label>
		<select class="form-control" id="r_inputLevel">
			<option value="Beginner">Beginner</option>
			<option value="Intermediate">Intermediate</option>
			<option value="Expert">Expert</option>
		</select>
	</div>
	<div class="form-group">
		<label>Meal Type</label>
		<input type="text" class="form-control" id="r_inputMealType">
	</div>
	<div class="form-group">
		<button type="submit" class="btn btn-primary">Submit Recipe</button>
	</div>
</form>