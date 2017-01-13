/**
 * Created by jharing10 on 2017/01/13.
 */
function str_slug(Text) {
    return Text
        .toLowerCase()
        .replace(/[^\w ]+/g,'')
        .replace(/ +/g,'-')
        ;
}