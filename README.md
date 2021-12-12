Steps :

    1) composer update

    2) Follow below url to setup the google drive as filesystem

        https://gist.github.com/sergomet/f234cc7a8351352170eb547cccd65011

    3) For Setting Cron Job

        * * * * * cd /path-to-your-project && php artisan schedule:run >> /dev/null 2>&1

    4) For RestApi Output

        project-url/launches?page={num}&size={pagesize}
    
    5) For Deploying Project on AWS below steps can be used

        https://medium.com/nerd-for-tech/how-to-deploy-laravel-project-on-ec2-aws-6d004a57bb1f

    6) For Migrating & seeding the Schema

        -- php artisan migrate
        -- php artisan db:seed

    7) Challenging Product  ( Genie )

       -- CroudFunding Product include IOS and Android App and laravel for backend (CMS + API)
       -- Video Streaming App
       -- Include use of 
            1) ElasticSearch - for fast retrival of Videos as per location of user.
            2) Redis - for Caching and broadcasting of events.
            3) Websocket - for triggering action to the ios app. ( for ex. Auto Login once the email is verified after user is registered)
            4) Paypal - for Batch Processing of payment request by user between the dates




    
