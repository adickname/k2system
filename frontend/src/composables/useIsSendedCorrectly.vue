<script>
import { ref } from 'vue';

const sendedCorrectly = ref()
export function useIsSendedCorrectly() {
    return { sendedCorrectly }
}
</script>