// Stripped file names of .min to simplify the calling here
define(['./html5shiv'], function(shiv)
{
    shiv.log('Hello World!');
});

define(['./respond'], function(resp)
{
    resp.log('Hello World!');
});

define(['./jquery'], function(jq)
{
    jq.log('Hello World!');
});

define(['./bootstrap'], function(twboot)
{
    twboot.log('Hello World!');
});