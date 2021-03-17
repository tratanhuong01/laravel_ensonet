function getUserID() {
    const userIdMetaTag = document.querySelector("meta[property='userID']");
    const userID = userIdMetaTag.getAttribute("content");
    return userID;
}