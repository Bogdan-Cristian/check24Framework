<?php
$template = $twig->load('login.html.twig');

if($request->getMethod() == "POST")
{
    $username = $request->request->get('username');
    $password = $request->request->get('password');

    $db->query('user', ['username' => $username,'password' => $password]);
    $res = $db->persist();

    if($res->num_rows > 0) {
        $session->setParams(['logged' => 'true']);
        echo $template->render(['redirect_button'=> true]);
    } else {
        echo $template->render(['error' => true]);
    }

//    header("Location: /");
} else {
    echo $template->render(['errors' => []]);
}
