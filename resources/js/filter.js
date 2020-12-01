import Vue from 'vue'
/* filters */

// capitalize
Vue.filter("capitalize", value => {
    if (!value) return "";
    value = value.toString();
    return value.charAt(0).toUpperCase() + value.slice(1);
});
/*****************************************************************************/
// slug
Vue.filter("slug", value => {
    if (!value) return "";
    value = value.toString();
    return value.replace(/[-_.,]/g, ' ');
});
/*****************************************************************************/
