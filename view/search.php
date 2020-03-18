<div id="search">
    <label for="categories">Searched by categories</label>
    <select name="categories" id="categories">
        <option value="song">Song</option>
        <option value="singer">Singer</option>
        <option value="no">Code</option>
    </select>
    <input type="text" name="searchInput" id="searchInput" required/>
    <input type="button" name="submit" id="submit" value="Search"/>
</div>
<div id="searchResults">
</div>
<script src="../public/js/songApi.js"></script>