<?php require('partials/head.php') ?>

<h2>update post</h2>

<form action="/update/home" method="post">

    <h3>Home page</h3>

    <label for="new_title">new title</label>
    <input type="text" name="new_title" placeholder="new post title" value="<?= $data['home']['title'] ?>" required />

    <br />

    <label for="new_text">new text</label>
    <input type="text" name="new_text" placeholder="new post text" value="<?= $data['home']['text'] ?>" required />

    <br />

    <button type="submit">Submit</button>

</form>

<br />

<form action="/update/about" method="post">

    <h3>About page</h3>

    <label for="new_title">new title</label>
    <input type="text" name="new_title" placeholder="new post title" value="<?= $data['about']['title'] ?>" required />

    <br />

    <label for="new_text">new text</label>
    <input type="text" name="new_text" placeholder="new post text" value="<?= $data['about']['text'] ?>" required />

    <br />

    <button type="submit">Submit</button>

</form>

<br />

<form action="/update/contact" method="post">

    <h3>Contact page</h3>

    <label for="new_title">new title</label>
    <input type="text" name="new_title" placeholder="new post title" value="<?= $data['contact']['title'] ?>" required />

    <br />

    <label for="new_text">new text</label>
    <input type="text" name="new_text" placeholder="new post text" value="<?= $data['contact']['text'] ?>" required />

    <br />

    <button type="submit">Submit</button>

</form>

<?php require('partials/footer.php') ?>