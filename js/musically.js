/**
 * CONSTANTS
 */

const LOGIN_ERROR = "Wrong credentials";
const REGISTER_ERROR = "Wrong parameters";
const WRONG_PASSWORD_ERROR = "Please, read the password requirements";

/**
 * EVENTS
 */

$("#chat-content").keyup(function (event) {
  if (event.keyCode == 13) {
    postMessage();
  }
});

$("#login-password").keyup(function () {
  if (event.keyCode == 13) {
    loginUser();
  }
});

$("#login-btn").click(function () {
  loginUser();
});

$("#register-btn").click(function () {
  var isValid = validateRegistration();
  if (isValid) {
    registerUser();
  } else {
    toggleLoginModal(REGISTER_ERROR, WRONG_PASSWORD_ERROR);
  }
});

$(".menu-profile").click(function () {
  var loginDisplay = $("#login-form").css("display") == "flex";
  var registerDisplay = $("#register-form").css("display") == "flex";
  var sideMenuDisplay = $(".side-menu").css("display") == "flex";
  var color = loggedIn ? "green" : "black";
  $(".material-icons.menu-icon").text("menu");
  if (sideMenuDisplay) {
    $(".side-menu").css({
      "display": "none"
    });
  }
  if (loginDisplay || registerDisplay) {
    $(".material-icons.menu-profile").text("person").css("color", color);
    $("#login-form").slideUp(350);
    $("#register-form").slideUp(350);
  } else {
    $(".material-icons.menu-profile").text("close").css("color", "black");
    $("#login-form").slideDown(350);
    $("#login-form").css({
      "display": "flex"
    });
  }
});

$(".login-not-registered").click(function () {
  var display = $("#register-form").css("display") == "none";
  if (display) {
    $("#login-form").slideUp(350);
    $("#register-form").slideDown(350);
    $("#register-form").css({
      "display": "flex"
    });
  } else {
    $("#register-form").slideUp(350);
    $("#login-form").slideDown(350);
    $("#login-form").css({
      "display": "flex"
    });
  }
});

$(".side-menu").hide();

$(".menu-icon").click(function () {
  var headerHeight = parseInt($(".header").css("height"));
  var totalHeight = $(document).height() - headerHeight - 21;
  var color = loggedIn ? "green" : "black";
  if ($(".side-menu").is(":visible")) {
    $(".material-icons.menu-icon").text("menu");
  } else {
    $(".material-icons.menu-icon").text("close");
  }
  $(".material-icons.menu-profile").text("person").css("color", color);
  $(".side-menu").css("height", totalHeight);
  $("#login-form").hide();
  $("#register-form").hide();
  $(".side-menu").animate({
    width: 'toggle'
  }, 350);
});

$(".logout").click(function () {
  logoutUser();
});

// setInterval(function () {

// }, 1500);

/**
 * USABLE FUNCTIONS
 */

function postMessage() {
  var chatContent = $("#chat-content").val();
  $.ajax({
    type: 'POST',
    url: 'controllers/messagesController.php',
    data: {
      chatContent: chatContent
    },
    success: function () {
      $("#chat-content").val("");
    }
  });
}

function getMessages() {
  $.ajax({
    type: 'GET',
    url: 'controllers/messagesController.php',
    data: {
      chatMessages: true
    },
    success: function () {

    }
  });
}

function loginUser() {
  var username = $("#login-username").val();
  var password = $("#login-password").val();
  $.ajax({
    type: 'POST',
    url: 'controllers/usersController.php',
    data: {
      loginButton: true,
      username: username,
      password: password
    },
    success: function () {
      window.location = "/";
    },
    error: function (response) {
      toggleLoginModal(LOGIN_ERROR, JSON.parse(response.responseText).message);
    }
  });
}

function registerUser() {
  var username = $("#register-username").val();
  var password = $("#register-password").val();
  var repeatedPassword = $("#register-repeat-password").val();
  $.ajax({
    type: 'POST',
    url: 'controllers/usersController.php',
    data: {
      registerButton: true,
      username: username,
      password: password,
      repeatedPassword: repeatedPassword
    },
    success: function () {
      window.location = "/";
    },
    error: function (response) {
      toggleLoginModal(REGISTER_ERROR, JSON.parse(response.responseText).message);
    }
  });
}

function validateRegistration() {
  var username = $("#register-username").val();
  var password = $("#register-password").val();
  var repeatedPassword = $("#register-repeat-password").val();
  var pattern = new RegExp(/(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}/);
  var patternMatch = pattern.test(password)
  var passwordsMatch = password === repeatedPassword;
  var usernameMatch = username.length <= 50 && !!username;
  return passwordsMatch && patternMatch && usernameMatch;
}

function toggleLoginModal(title, message) {
  $("#modal-title").text(title);
  $("#login-modal-body").text(message);
  $("#login-modal").modal("toggle");
}

function logoutUser() {
  $.ajax({
    type: 'POST',
    url: 'controllers/usersController.php',
    data: {
      logoutButton: true
    },
    success: function () {
      window.location = "/";
    }
  });
}

var loggedIn = $(".material-icons.menu-profile").css("color") == "rgb(0, 128, 0)";