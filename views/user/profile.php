<?

use core\Core;
use models\User;

 if (isset($_SESSION['user'])) : ?>
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="card е" style="width: 25rem; margin-top: 3%;">
                    <div class="card-header">
                        <svg width="30px" height="30px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <g id="style=fill">
                                <g id="profile">
                                    <path id="vector (Stroke)" fill-rule="evenodd" clip-rule="evenodd" d="M6.75 6.5C6.75 3.6005 9.1005 1.25 12 1.25C14.8995 1.25 17.25 3.6005 17.25 6.5C17.25 9.3995 14.8995 11.75 12 11.75C9.1005 11.75 6.75 9.3995 6.75 6.5Z" fill="#000000" />
                                    <path id="rec (Stroke)" fill-rule="evenodd" clip-rule="evenodd" d="M4.25 18.5714C4.25 15.6325 6.63249 13.25 9.57143 13.25H14.4286C17.3675 13.25 19.75 15.6325 19.75 18.5714C19.75 20.8792 17.8792 22.75 15.5714 22.75H8.42857C6.12081 22.75 4.25 20.8792 4.25 18.5714Z" fill="#000000" />
                                </g>
                            </g>
                        </svg>
                        Profile
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">Email: <span class="text-muted mb-0"><?= $_SESSION['user']['email'] ?></span></li>
                        <li class="list-group-item">Admin rights: <span class="text-muted mb-0"><?

                                                                                                if (User::isAdmin()) {
                                                                                                    echo "True";
                                                                                                } else {
                                                                                                    echo "False";
                                                                                                }
                                                                                                ?></span>
                        </li>
                        <li class="list-group-item"><a class="btn btn-dark d-flex justify-content-center" href="/user/edit/<?= $_SESSION['user']['email'] ?>">Edit info
                                <svg width="25px" height="25px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M16.737 3.727a1.3 1.3 0 0 1 1.839 0l1.697 1.697a1.3 1.3 0 0 1 0 1.838L8.818 18.718a.5.5 0 0 1-.256.136l-3.535.707a.5.5 0 0 1-.589-.588l.708-3.535a.5.5 0 0 1 .136-.256l8.84-8.839 3.535 3.536.707-.707-3.536-3.536 1.91-1.91Z" fill="#ffffff" />
                                </svg></a>
                        </li>
                    </ul>
                </div>

            </div>
            <div class="col">
                <div class="card" style="width: 50rem; margin-top: 1.5%;">
                    <div class="card-header">
                        Orders
                    </div>
                    <ul class="list-group list-group-flush">
                        <? foreach ($array_data as $value) : ?>
                            <li class="list-group-item">
                                <a href="/user/order/<?= $value["id"] ?>" style="text-decoration: none; color: inherit;">Номер замволення: <?= $value["id"] ?>.
                                    <span class="text-muted mb-0">Дата: <?= $value["date"] ?>.</span>
                                </a>
                            </li>
                        <? endforeach; ?>
                    </ul>
                </div>
            </div>
        </div>
    <? else : Core::getInstance()->Redirect("/user/login"); ?>
    <? endif; ?>