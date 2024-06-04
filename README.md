
# Delta Hotels - London Armouries ~ Samsung Kiosk CMS

## Project Details
- dev: J.Debono
- initialized: Nov. 11, 2023
- launch date: Dec 18, 2023
- data control system for Samsung informational Kiosk   
    - kiosk repo: DeltaHotelsKiosk [^1]


## Dependencies

- [Jetstream & Livewire](https://jetstream.laravel.com/installation.html).
- [Livewire - New personal team disabled](https://medium.com/devlan-io/disabling-personal-teams-in-laravel-8-and-jetstream-1fd083593e08).
- [TinyMCE Text Editor](https://www.tiny.cloud/docs/tinymce/6/laravel-tiny-cloud/#requirements) *added, but not used*
- [Intervention/Image](https://image.intervention.io/v2).
- [Laravel-DOM PDF printer](https://github.com/barryvdh/laravel-dompdf).

## Content Scheduler

- developed using Laravel Task Scheduler processes for image content display
- 2 part set up: 
    - Custom Artisan Command: app/console/EventScheduler.php
        - select event based on current date, turn on
        - delete event based on previous date
    - command runs in the app/console/kernel.php
- server is Windows based, and task automation is added via the Windows native Task Scheduler
    - function runs 1x daily at 3am


## Database Details [^2]

| Primary Table      | Secondary Table        | Relationship       |
| :----------------- | :--------------------- | :--------------    |
| analytics          |                        |                    |
| attractions        | attraction_categories  | 1:M                |
| banners            | banner_categories      | 1:M                |
| events             | rooms                  | 1:M room_id        |
| floors             | rooms                  | 1:M floor_id       |
| maps               |                        |                    |        
| menus              | menu_types             | 1:M type_id        |
| menus              | restaurants            | 1:M rest_id        |
| versions           |                        |                    |


### Teams & Authentication Details
- roles: 
    - ELM master Admin: eyelook (Eyelook User)
    - Delta: delta (Delta User)
    - adding users to teams is done by invite to team only. Individuals can not self register
- individual user teams are disabled
- users are managed via app/HTTP/Livewire/AllUsers.php 


### Analytics
- tracks basic user interactions
- data collection from the kiosk runs via the app/HTTP/Controllers/AnalyticsController.php
    - runs the store function
- date processing and output done via app/HTTP/Livewire/Analytics.php
- uses the PDF printing dependancy to generate downloadable reports


### Permissions - See App/Policies 
- ELM granted full privlidges
- Delta granted permission for
    - Teams: Delta (view, invite or remove team members)
    - Users: Delta (view, and delete users from the database)
    - Events: add, update and delete


## Other Details.
- CSS via tailwindCSS
    - see tailwind.config.js for customized CSS information
    - FONTS ~ app.css: fonts are configured to have a hardcoded path. Vite bundles the custom fonts without using a correct url, preventing the custom font from displaying. Once the font is added as a second url, copy and paste the required font from the font folder to the build assets folder to ensure they display properly in the live project *NOTE: every time BUILD is run, these files need to be copied back into the assets folder - need to find a better way to do this

- Team Invitation Emails
    - custom email was created to replace the default. (email.team-invitation changed to email.teamInvite)
    - configuration changed in vendors/laravel/jetstream/src/mail/TeamInvitation file


[^1]: Repo does not contain the master .zip file of the kiosk widget. This file is contained in the client folder on the ELM VPN.
[^2]: Database details for teams are auto-populated.





