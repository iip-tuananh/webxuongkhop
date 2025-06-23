<script>
    class Rate extends BaseClass {
        no_set = [
            'send_at'
        ];

        before(form) {
            this.image = {};
        }

        after(form) {
            this._send_at = form.send_at;

        }

        get send_at() {
            return dateGetter(this._send_at, 'YYYY-MM-DD HH:mm:ss', "HH:mm:ss DD/MM/YYYY");
        }

        set send_at(value) {
            this._send_at = dateSetter(value, "HH:mm:ss DD/MM/YYYY", 'YYYY-MM-DD HH:mm:ss');
        }

        get submit_data() {
            let data = {
                title: this.title,
                user_name: this.user_name,
                user_email: this.user_email,
                user_address: this.user_address,
                user_phone: this.user_phone,
                send_at: this._send_at,
                rating: this.rating,
                content: this.content,
                productid: this.productid,
                status: this.status,
            }

            return data;
        }
    }
</script>
