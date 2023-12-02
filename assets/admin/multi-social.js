
function addRepeaterItem() {
    var container = document.querySelector('.repeater-container');
    var newItem = document.createElement('div');
    newItem.className = 'repeater-item';
    newItem.innerHTML = `
        <select name="sk_repeater_settings[][select]" required>
            <option value="facebook">Facebook</option>
            <option value="twitter">Twitter</option>
            <option value="linkedin">Linkedin</option>
            <option value="instagram">Instagram</option>
            <option value="email">Email</option>
            <option value="whatsapp">Whatsapp</option>
            <option value="youtube">Youtube</option>
            <option value="telegram">Telegram</option>
            <option value="viber">Viber</option>
            <option value="pinterest">Pinterest</option>
            <option value="tumblr">Tumblr</option>
            <option value="reddit">Reddit</option>
            <option value="vk">VK</option>
            <option value="xing">Xing</option>
            <option value="get-pocket">Get Pocket</option>
            <option value="digg">Digg</option>
            <option value="stumbleupon">StumbleUpon</option>
            <option value="weibo">Weibo</option>
            <option value="renren">Renren</option>
            <option value="skype">Skype</option>
            <option value="quora">Quora</option>
            <option value="snapchat">Snapchat</option>
            <option value="flicker">Flicker</option>
            <option value="odnoklassniki">Odnoklassniki</option>
            <option value="moimir">Moimir</option>
            <option value="blogger">Blogger</option>
            <option value="evernote">Evernote</option>
            <option value="delicious">Delicious</option>
            <option value="surfingbird">Surfingbird</option>
            <option value="liveinternet">Liveinternet</option>
            <option value="buffer">Buffer</option>
            <option value="instapaper">Instapaper</option>
            <option value="wordpress">WordPress</option>
            <option value="baidu">Baidu</option>
            <option value="line">Line</option>
        </select>
        <button type="button" class="remove-item" onclick="removeRepeaterItem(this)">Remove</button>
    `;
    container.appendChild(newItem);
}

function removeRepeaterItem(button) {
    var container = button.parentNode;
    container.parentNode.removeChild(container);
}
