if (process.env.NODE_ENV === 'production')  {
    console.log('There is Production mode');
} else {
    console.log('There is Development mode');
}

require('./vendor');
require('js/site');
require('css/site.scss');