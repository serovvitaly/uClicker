<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Untitled</title>
</head>
<body>
<script src="//vk.com/js/api/openapi.js" type="text/javascript"></script>
<script type="text/javascript">
    VK.init({
        apiId: 4335971
    });

    VK.Auth.logout();

    VK.Auth.login(function(data){
        console.log(data);
    }, 8192);

    VK.Auth.getLoginStatus(function(status){
        VK.Api.call('wall.post', {
            message: '<?= isset($_GET['note']) ? $_GET['note'] : "" ?>',
            attachments: 'http://masterbiznesa.ru/page-1234?fi=34'
        }, function(data) {
            console.log(data);
        });
    });

</script>

</body>
</html>