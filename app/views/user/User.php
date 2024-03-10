<section>
    <main class="container pt-5">
        <article class="bg-success-subtle rounded-2 p-2 text-success d-flex align-items-center justify-content-between">
            <span>Kullanıcılar</span>
            <div>
                <a href="/php/user/" class="btn btn-outline-success">Geri Dön</a>
                <a href="/php/user/" class="btn btn-success">Listele</a>
            </div>
        </article>
        <article>
            <form class="mt-3" action="/php/user/add" method="post">
                <input class="rounded-2 deneme" type="text" id="username" name="username" placeholder="Kullanıcı Adı" required>
                <input class="rounded-2" type="email" id="email" name="email" placeholder="E-Mail" required>
                <input class="rounded-2" type="password" id="password" name="password" placeholder="Parola" required>
                <input class="rounded-2 deneme" type="submit" value="Kullanıcı Ekle">
            </form>
        </article>
        <article>
            <table class="table mt-3 table-striped">
                <thead>
                    <tr>
                        <th scope="col">Kullanıcı</th>
                        <th scope="col">Mail</th>
                        <th scope="col">Parola</th>
                    </tr>
                </thead>
                <tbody>

                    <?php foreach ($data['listUserResult'] as $user) : ?>
                        <tr>
                            <td><?= $user["username"] ?></td>
                            <td><?= $user['email'] ?></td>
                            <td><?= $user['parola'] ?></td>
                            <td>
                                <div class="d-flex flex-row align-items-center gap-2">
                                    <button type="submit" class="btn btn-secondary update-btn" data-user-id="user-details-<?= $user['id'] ?>">Güncelle</button>
                                    <form action="/php/user/delete" method="post">
                                        <input type="hidden" name="userId" value="<?= $user['id'] ?>">
                                        <button type="submit" class="btn btn-danger">Sil</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        <tr class="d-none" id="user-hide-<?= $user['id'] ?>">
                            <td colspan="12">
                                <form action="/php/user/update" method="post">
                                    <input class="rounded-2" type="text" id="username" name="username" placeholder="Kullanıcı Adı" required>
                                    <input class="rounded-2" type="email" id="email" name="email" placeholder="E-Mail" required>
                                    <input class="rounded-2" type="password" id="password" name="password" placeholder="Parola" required>
                                    <input type="hidden" name="userId" value="<?= $user['id'] ?>">
                                    <input class="rounded-2 deneme" type="submit" value="Kullanıcı Güncelle">
                                </form>
                            </td>
                        </tr>
                        <tr class="d-none">
                            <td></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </article>
    </main>
</section>

<script src="../assets/js/updateButton.js"></script>