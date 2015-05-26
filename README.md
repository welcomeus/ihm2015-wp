Core wordpress files for www.welcome.us

To get running locally, download the latest DB Dump via wpengine, then duplicate `wp-config-local-sample.php` to `wp-config-local.php`.  Update with your credentials.

## Deployment

Add your keys via wpengine, then add the following remotes:

* `git remote add production git@git.wpengine.com:production/welcomeus.git`
* `git remote add staging git@git.wpengine.com:staging/welcomeus.git`

Then deploy from master to either remote.
