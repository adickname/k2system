<script>
import { ref } from "vue";

const isLoged = ref(false);

export function useIsLoged() {
  return {
    isLoged,
  };
}
</script>