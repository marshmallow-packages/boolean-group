import IndexField from "./components/IndexField";
import DetailField from "./components/DetailField";
import FormField from "./components/FormField";

Nova.booting((app, store) => {
    app.component("index-boolean-group", IndexField);
    app.component("detail-boolean-group", DetailField);
    app.component("form-boolean-group", FormField);
});
