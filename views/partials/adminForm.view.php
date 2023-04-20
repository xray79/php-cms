<form action="/update/home" method="post">

    <h3>Home page</h3>

    <input type="number" name="id" value=1 hidden />

    <label for="new_title">new title</label>
    <input type="text" name="new_title" placeholder="new post title" value="<?= $data['home']['title'] ?>" required />

    <br />

    <label for="new_text">new text</label>
    <input type="text" name="new_text" placeholder="new post text" value="<?= $data['home']['text'] ?>" required />

    <br />

    <button type="submit">Submit</button>

</form>