<script>
import axios from "axios";
import { useIsLoged } from "@/composables/useIsLoged.vue";
import { useIsSendedCorrectly } from "./useIsSendedCorrectly.vue";
const { isLoged } = useIsLoged()
const { sendedCorrectly } = useIsSendedCorrectly()
const logout = async (backendUrlLogout) => {
  const response = await axios.post(
    backendUrlLogout, {},
    {
      withCredentials: true, withXSRFToken: true
    }
  );
  if (response.status === 200) {
    sendedCorrectly.value = true;
    isLoged.value = false;
  } else {
    sendedCorrectly.value = false;
  }
};

const login = async (role, backendUrlLogin, username, password) => {
  let loginData = {
    ...(role == "admin"
      ? { username: username }
      : { email: username }),
    password: password,
  };
  const response = await axios.post(backendUrlLogin, loginData, {
    withCredentials: true, withXSRFToken: true
  });
  if (response.status === 200) {
    sendedCorrectly.value = true;
    isLoged.value = true;
  } else {
    sendedCorrectly.value = false;
  }
};

const register = async (role, backendUrlRegister, username, password) => {

  let loginData = {
    ...(role == "admin"
      ? { username: username }
      : { email: username }),
    password: password,
  };

  const response = await axios.post(backendUrlRegister, loginData, { withCredentials: true, withXSRFToken: true });
  if (response.status === 201) {
    sendedCorrectly.value = true;
    isLoged.value = true;
  } else {
    sendedCorrectly.value = false;
  }
};


export function useLoginSystemFunctions() {
  return {
    logout, login, register
  };
}
</script>